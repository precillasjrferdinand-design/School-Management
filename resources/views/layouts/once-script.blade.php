<script>
// Stops double clicks: the first submit locks the form, later ones are ignored.
document.querySelectorAll('form[data-once]').forEach(function (form) {
    form.addEventListener('submit', function (e) {
        if (form.dataset.sent === '1') { e.preventDefault(); return; }
        form.dataset.sent = '1';
        form.querySelectorAll('button').forEach(function (b) {
            b.disabled = true;
            if (b.dataset.busy) b.textContent = b.dataset.busy;
        });
    });
});
// Back button restoring a locked form from the browser cache: unlock it.
window.addEventListener('pageshow', function (e) {
    if (!e.persisted) return;
    document.querySelectorAll('form[data-once]').forEach(function (f) {
        f.dataset.sent = '0';
        f.querySelectorAll('button').forEach(function (b) { b.disabled = false; });
    });
});
</script>

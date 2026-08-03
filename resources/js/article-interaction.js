/**
 * Article Like & Bookmark interactions (AJAX toggle, no page reload).
 * Uses event delegation so buttons added via pagination work automatically.
 */

function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]')?.content || '';
}

function syncButtonState(btn, action, active, count) {
    const icon = btn.querySelector('.material-symbols-outlined');
    const countEl = btn.querySelector(`.${action}-count`);

    btn.setAttribute('aria-pressed', active ? 'true' : 'false');
    if (icon) {
        const filledIcon = action === 'like' ? 'favorite' : 'bookmark';
        const outlineIcon = action === 'like' ? 'favorite_border' : 'bookmark_border';
        icon.textContent = active ? filledIcon : outlineIcon;
    }
    if (countEl !== null && typeof count === 'number') {
        countEl.textContent = count;
    }
}

document.addEventListener('click', (e) => {
    const btn = e.target.closest('button[data-action]');
    if (!btn || btn.disabled) return;

    const action = btn.dataset.action; // 'like' | 'bookmark'
    const articleId = btn.dataset.articleId;
    if (!articleId) return;

    const url = `/articles/${articleId}/${action}`;
    const wasActive = btn.getAttribute('aria-pressed') === 'true';
    const prevCount = parseInt(btn.querySelector(`.${action}-count`)?.textContent || '0', 10);

    // Optimistic UI
    btn.disabled = true;
    syncButtonState(btn, action, !wasActive, wasActive ? prevCount - 1 : prevCount + 1);

    fetch(url, {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': getCsrfToken(),
            'Accept': 'application/json',
        },
        credentials: 'same-origin',
    })
        .then((res) => {
            if (!res.ok) throw new Error('Request failed');
            return res.json();
        })
        .then((data) => {
            const key = action === 'like' ? 'liked' : 'bookmarked';
            const countKey = action === 'like' ? 'likesCount' : 'bookmarksCount';
            syncButtonState(btn, action, !!data[key], data[countKey]);
        })
        .catch(() => {
            // Rollback on error
            syncButtonState(btn, action, wasActive, prevCount);
        })
        .finally(() => {
            btn.disabled = false;
        });
});

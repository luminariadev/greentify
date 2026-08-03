/**
 * Profile Follow interactions (AJAX toggle for follow/unfollow).
 * Uses event delegation to handle dynamically added follow buttons.
 */

function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]')?.content || '';
}

function syncFollowButton(button, following, followersCount) {
    const icon = button.querySelector('.material-symbols-outlined');
    const label = button.querySelector('.follow-label');

    button.setAttribute('aria-pressed', following ? 'true' : 'false');
    if (icon) {
        icon.textContent = following ? 'person_remove' : 'person_add';
    }
    if (label) {
        label.textContent = following ? 'Mengikuti' : 'Ikuti';
    }

    // Update the followers count badge nearby (optional)
    const followersBadge = button.closest('.profile-stats')?.querySelector('.followers-count');
    if (followersBadge && typeof followersCount === 'number') {
        followersBadge.textContent = followersCount;
    }
}

document.addEventListener('click', (e) => {
    const btn = e.target.closest('button[data-action="follow"]');
    if (!btn || btn.disabled) return;

    const userId = btn.dataset.userId;
    if (!userId) return;

    const url = `/users/${userId}/follow`;
    const wasFollowing = btn.getAttribute('aria-pressed') === 'true';

    // Optimistic UI
    btn.disabled = true;
    syncFollowButton(btn, !wasFollowing, null);

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
            const following = data.following;
            const followersCount = data.followersCount;
            syncFollowButton(btn, following, followersCount);
        })
        .catch((err) => {
            // Rollback UI on error
            syncFollowButton(btn, wasFollowing, null);
        })
        .finally(() => {
            btn.disabled = false;
        });
});

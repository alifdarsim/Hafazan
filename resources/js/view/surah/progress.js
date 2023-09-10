import {Toast, Swala as Swal} from "../../components.js";
import axios from "../../axiosWrapper.js";

const deleteBookmark = (id, verseKey) => {
    Swal.trigger({
        title: `Delete Bookmark`,
        text: `Are you sure want to delete this bookmark?`,
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/api/bookmark/${id}`, {
            }).then((response) => {
                const res = response.data;
                if (res.status === 'success') {
                    let bookmarkButtons = document.querySelectorAll(`.bookmark-button[verse-key="${verseKey}"]`);
                    bookmarkButtons.forEach(e => {
                        e.querySelector('span').textContent = '';
                        e.querySelector('i').classList.remove('text-red-500', 'fa-solid');
                    });
                    getUserBookmark(window.chapter);
                    Toast.setText(`Bookmark deleted`);
                }
            });
        }
    });
}

const buttons = document.querySelectorAll('.read-button, .memorize-button, .unfluent-button, .bookmark-button');
buttons.forEach((button) => {
    button.addEventListener('click', () => {
        const verseKey = button.getAttribute('verse-key');
        const action = button.getAttribute('data-action');
        const actionText = {
            'read': 'read',
            'memorize': 'memorized',
            'unfluent': 'unfluent',
            'bookmark': 'bookmarked',
        }[action];

        if (action === 'bookmark') {
            // call api to get bookmark list
            Swal.trigger({
                title: `Bookmark List`,
                html: `<div class="">
                            <div class="h-48 min-h-full flex justify-center items-center no-item">
                                 <div class="flex flex-col items-center">
                                    <div class="">
                                        <div class="text-center text-gray-400 mb-2"><i class="fa-duotone fa-bookmark-slash text-5xl"></i></div>
                                        <div class="text-center text-gray-400">No bookmark found, add new bookmark first</div>
                                    </div>
                                </div>
                            </div>
                            <div class="has-item min-h-[250px] max-h-[500px] overflow-y-auto flex flex-col gap-2"></div>
                       </div>`,
                cancelButtonText: 'Close',
                confirmButtonText: 'Add Bookmark',
                didOpen: () => {
                    axios.get(`/api/bookmark/key/${verseKey}`).then((response) => {
                        const res = response.data;
                        if (res.status === 'success') {
                            let data = res.data;
                            if (data.length === 0) document.querySelector('.has-item').classList.add('hidden');
                            else {
                                document.querySelector('.no-item').classList.add('hidden');
                                let bookmarkList = document.querySelector('.has-item');
                                bookmarkList.innerHTML = '';
                                data.forEach(e => {
                                    bookmarkList.innerHTML += `<div class="bg-slate-100 dark:bg-navy-500 px-4 py-2 rounded-lg flex justify-between">
                                        <div>
                                            <div class="text-left">
                                                <span class="text-xs text-gray-400"><i class="fa-solid text-[9px] fa-user me-1"></i> ${e.user.name}</span>
                                                <span class="text-gray-400"> | </span>
                                                <span class="text-xs text-gray-400">Verse: ${e.surah}:${e.verse}</span>
                                            </div>
                                            <div class="text-sm text-left ${e.note ?? "dark:text-gray-500 text-[12px]"}">${e.note ?? "No notes"}</div>
                                        </div>
                                        <div class="flex flex-col items-center justify-center">
                                            <button data-id="${e.id}" class="bookmark-delete btn btn-sm btn-primary ps-2 pe-0"><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </div>`;
                                });
                                document.querySelectorAll('.bookmark-delete').forEach((button) => {
                                    button.addEventListener('click', () => {
                                        deleteBookmark(button.getAttribute('data-id'), verseKey);
                                    });
                                });
                            }
                        }
                    });
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.trigger({
                        title: `Bookmark verse`,
                        input: 'textarea',
                        inputPlaceholder: 'Write your note here if any...',
                        text: 'Set a note for this verse (optional)',
                        confirmButtonText: 'Save',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            updateBookmark(verseKey, result.value);
                        }
                    });
                }
            });

        } else {
            // Find span inside button and change the text
            Swal.trigger({
                title: `Mark as ${actionText}?`,
                text: `Mark verse (${verseKey.split(':')[0]}) as ${actionText}?`,
            }).then((result) => {
                if (result.isConfirmed) {
                    updateProgress(verseKey, action);
                }
            });
        }

    });
});


const updateProgress = (verseKey, type) => {
    axios.post('/api/progress/store', {surah: verseKey.split(':')[0], verse: verseKey.split(':')[1], type: type}, {
    }).then((response) => {
        const res = response.data;
        if (res.status === 'success') {
            res.data.forEach(e => renderIconProgress(e));
            Toast.setText(`Verse '${verseKey}' is marked as ${type}`);
        }
    });
}

const updateBookmark = (verseKey, note) => {
    axios.post('/api/bookmark/store', {surah: verseKey.split(':')[0], verse: verseKey.split(':')[1], note: note}, {
    }).then((response) => {
        const res = response.data;
        if (res.status === 'success') {
            let data = res.data;
            data.forEach(e => renderIconBookmark(e));
            Toast.setText(`Add Bookmark at verse '${verseKey}'`);
        }
    });
}

const getUserProgress = (surah) => {
    axios.post('/api/progress', {surah: surah}, {
    }).then((response) => {
        const res = response.data;
        if (res.status === 'success') {
            res.data.forEach(e => renderIconProgress(e));
        }
    });
}

const getUserBookmark = (surah) => {
    axios.get(`/api/bookmark/${surah}`, {
    }).then((response) => {
        const res = response.data;
        if (res.status === 'success') {
            let data = res.data;
            data.forEach(e => renderIconBookmark(e));
        }
    });
}

const renderIconProgress = (e) => {
    console.log(e)
    let read_button = document.querySelector(`.read-button[verse-key="${e.verse_key}"]`);
    let memorize_button = document.querySelector(`.memorize-button[verse-key="${e.verse_key}"]`);
    let unfluent_button = document.querySelector(`.unfluent-button[verse-key="${e.verse_key}"]`);
    if (e.read !== 0 && e.read !== undefined) {
        read_button.querySelector('i').classList.add('text-teal-500', 'fa-solid');
        read_button.querySelector('span').textContent = e.read;
    }
    if (e.memorize !== 0 && e.memorize !== undefined) {
        memorize_button.querySelector('i').classList.add('text-green-500', 'fa-solid');
        memorize_button.querySelector('span').textContent = e.memorize;
    }
    if (e.unfluent !== 0 && e.unfluent !== undefined) {
        unfluent_button.querySelector('i').classList.add('text-yellow-500', 'fa-solid');
        unfluent_button.querySelector('span').textContent = e.unfluent;
    }
}

const renderIconBookmark = (e) => {
    let bookmarkButton = document.querySelector(`.bookmark-button[verse-key="${e.verseKey}"]`);
    bookmarkButton.querySelector('span').textContent = e.count;
    bookmarkButton.querySelector('i').classList.add('text-red-500', 'fa-solid');
}

getUserProgress(window.chapter);
getUserBookmark(window.chapter);

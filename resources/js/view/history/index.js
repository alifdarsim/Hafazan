import axios from "../../axiosWrapper.js";
import {Swala, Toast} from "../../components.js";

axios.get('/api/timeline').then((response) => {
    let res = response.data;
    if (res.status === 'success'){
        let timeline = res.data;
        let timelineHtml = '';
        let colors = ['bg-teal-400', 'bg-red-400', 'bg-blue-400', 'bg-green-400', 'bg-yellow-400', 'bg-indigo-400', 'bg-pink-400', 'bg-purple-400', 'bg-gray-400', 'bg-orange-400'];
        let type_icon = {
            'read': 'fa-solid fa-book-open-reader text-blue-500',
            'memorize': 'fa-solid fa-badge-check text-green-500',
            'unfluent': 'fa-solid fa-diamond-exclamation text-yellow-500',
        }
        if (timeline.length === 0) {
            return;
        }
        document.querySelector('.no-history').classList.add('!hidden');
        timeline.forEach((item, i) => {
            timelineHtml += `
                <li class="timeline-item !pb-6" verse-key="${item.verse_key}" data-id="${item.id}">
                    <div class="timeline-item-point rounded-full ${colors[i % colors.length]}"></div>
                    <div class="timeline-item-content flex-1 pl-8">
                        <div class="flex justify-between">
                            <div class="flex justify-between flex-col pb-0">
                                <div class="flex">
                                    <div class="text-xs text-slate-400 dark:text-navy-300">${item.user.name}</div>
                                </div>
                                <div class="flex justify-items-start items-center">
                                    <i class="me-2 ${type_icon[item.type]} text-base"></i>
                                    <div>
                                        <div class="capitalize font-semibold text-slate-600 dark:text-navy-100 sm:pb-0">${item.type} verse [${item.verse_key}]</div>
                                        <div class="text-xs text-slate-400 dark:text-navy-300">${item.created_at}</div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-outline btn-rounded btn-icon btn-primary px-2 mt-2" data-id="${item.id}"><i class="fa-solid fa-xmark-large"></i></button>
                        </div>
                 
                    </div>
                </li>
            `;
        });
        document.getElementsByClassName('timeline')[0].innerHTML = timelineHtml;
        document.querySelectorAll('.timeline-item button').forEach((button) => {
            button.addEventListener('click', () => {
                Swala.trigger({
                    title: `Delete progress`,
                    text: `Are you sure to delete this progress?`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteProgress(button.getAttribute('data-id'));
                    }
                });
            });
        });
    }
});



let filter_verse_key = document.getElementById('filter-verse');
filter_verse_key.addEventListener('keyup', (e) => {
    let filter = e.target.value;
    let items = document.getElementsByClassName('timeline-item');
    items = Array.from(items);
    items.forEach((item) => {
        let verse_key = item.getAttribute('verse-key');
        verse_key = verse_key.replace(/:/g, '')
        filter = filter.replace(/:/g, '')
        if (verse_key.includes(filter)) item.classList.remove('!hidden');
        else item.classList.add('!hidden');
    });
});

const deleteProgress = (id) => {
    axios.delete(`/api/timeline/${id}`).then((response) => {
        let res = response.data;
        if (res.status === 'success'){
            document.querySelectorAll('.timeline-item[data-id="' + id + '"]')[0].remove();
            Toast.setText('Progress deleted successfully', '#e54659');
        }
        if (res.status === 'error'){
            Toast.setText('Error deleting progress', '#e54659');
        }
    });
}
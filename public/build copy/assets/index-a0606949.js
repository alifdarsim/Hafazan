import{a as n}from"./axiosWrapper-ce9fae6d.js";import{S as c,T as d}from"./components-351c615f.js";import"./axios-4a70c6fc.js";n.get("/api/timeline").then(i=>{let s=i.data;if(s.status==="success"){let t=s.data,l="",a=["bg-teal-400","bg-red-400","bg-blue-400","bg-green-400","bg-yellow-400","bg-indigo-400","bg-pink-400","bg-purple-400","bg-gray-400","bg-orange-400"],o={read:"fa-solid fa-book-open-reader text-blue-500",memorize:"fa-solid fa-badge-check text-green-500",unfluent:"fa-solid fa-diamond-exclamation text-yellow-500"};if(t.length===0)return;document.querySelector(".no-history").classList.add("!hidden"),t.forEach((e,r)=>{l+=`
                <li class="timeline-item !pb-6" verse-key="${e.verse_key}" data-id="${e.id}">
                    <div class="timeline-item-point rounded-full ${a[r%a.length]}"></div>
                    <div class="timeline-item-content flex-1 pl-8">
                        <div class="flex justify-between">
                            <div class="flex justify-between flex-col pb-0">
                                <div class="flex">
                                    <div class="text-xs text-slate-400 dark:text-navy-300">${e.user.name}</div>
                                </div>
                                <div class="flex justify-items-start items-center">
                                    <i class="me-2 ${o[e.type]} text-base"></i>
                                    <div>
                                        <div class="capitalize font-semibold text-slate-600 dark:text-navy-100 sm:pb-0">${e.type} verse [${e.verse_key}]</div>
                                        <div class="text-xs text-slate-400 dark:text-navy-300">${e.created_at}</div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-outline btn-rounded btn-icon btn-primary px-2 mt-2" data-id="${e.id}"><i class="fa-solid fa-xmark-large"></i></button>
                        </div>
                 
                    </div>
                </li>
            `}),document.getElementsByClassName("timeline")[0].innerHTML=l,document.querySelectorAll(".timeline-item button").forEach(e=>{e.addEventListener("click",()=>{c.trigger({title:"Delete progress",text:"Are you sure to delete this progress?"}).then(r=>{r.isConfirmed&&u(e.getAttribute("data-id"))})})})}});let m=document.getElementById("filter-verse");m.addEventListener("keyup",i=>{let s=i.target.value,t=document.getElementsByClassName("timeline-item");t=Array.from(t),t.forEach(l=>{let a=l.getAttribute("verse-key");a=a.replace(/:/g,""),s=s.replace(/:/g,""),a.includes(s)?l.classList.remove("!hidden"):l.classList.add("!hidden")})});const u=i=>{n.delete(`/api/timeline/${i}`).then(s=>{let t=s.data;t.status==="success"&&(document.querySelectorAll('.timeline-item[data-id="'+i+'"]')[0].remove(),d.setText("Progress deleted successfully","#e54659")),t.status==="error"&&d.setText("Error deleting progress","#e54659")})};

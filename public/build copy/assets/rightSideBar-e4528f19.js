import{t as s}from"./translation-e6280241.js";import"./axios-4a70c6fc.js";import"./verse-9512725d.js";const g=()=>{s.initTranslatorDropDown(),document.querySelectorAll(".translation-button");const a=document.querySelector("#quran_font_plus"),l=document.querySelector("#quran_font_minus"),e=document.querySelector("#quran_font_text");a.addEventListener("click",function(){let t=localStorage.getItem("quranFontSize");t++,console.log(t),t>10&&(t=10),e.innerHTML=t,n(t),localStorage.setItem("quranFontSize",t)}),l.addEventListener("click",function(){let t=localStorage.getItem("quranFontSize");t--,console.log(t),t<1&&(t=1),e.innerHTML=t,n(t),localStorage.setItem("quranFontSize",t)}),localStorage.getItem("translatorId")||localStorage.setItem("translatorId",131),localStorage.getItem("quranFontSize")||localStorage.setItem("quranFontSize",5);const n=t=>{e.innerHTML=t;let i=20+4*parseInt(t)+"px",o=3+parseInt(t)*1.2-parseInt(t)+"px",r=parseInt(t)+parseInt(t)*2+"px";document.documentElement.style.setProperty("--main-font-size",i),document.documentElement.style.setProperty("--main-padding-left",o),document.documentElement.style.setProperty("--main-padding-right",o),document.documentElement.style.setProperty("--main-padding-top",r),document.documentElement.style.setProperty("--main-padding-bottom",r)};return{init:()=>{localStorage.getItem("translatorId");let t=localStorage.getItem("quranFontSize");n(t)}}};export{g as r};

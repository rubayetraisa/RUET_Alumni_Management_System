const hg=document.querySelector('.hg');
const loginpage=document.querySelector('.loglink');
const regpage=document.querySelector('.reglink');

regpage.addEventListener('click',()=>{
    hg.classList.add('active');
});
loginpage.addEventListener('click',()=>{
    hg.classList.remove('active');
});
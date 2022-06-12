
const options = {
    root:null,
    rootMargin: '0px',
    threshold: 0.5
}


const targets = document.querySelectorAll('.js');
const footer= document.querySelector('.footer');
window.addEventListener('scroll',()=>{
    console.log('test')
})
function hidden(){
    targets.forEach(target =>{
        target.classList.add('reveal');
    })

}
hidden();
const observer = new IntersectionObserver(callback, options);
function callback(entries, observer){
    entries.forEach(entry => {
        if(entry.isIntersecting){
            entry.target.classList.toggle('active');
            observer.unobserve(entry.target);
        }});
}
// @ts-ignore
for (const target of targets) {
    observer.observe(target);
}
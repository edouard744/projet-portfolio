/*

class DW_Controller
{
    constructor()
    {
        // Ici, le DOM n'est pas encore prêt
        // Pour le moment, rien à faire.

    }

    run()
    {

        const options = {
            root:null,
            rootMargin: '0px',
            threshold: 0.5
        }
        // Ici, le DOM est prêt.
        const targets = document.querySelectorAll('.js');
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
        for (const target of targets) {
            observer.observe(target);
        }

    }
}

window.dw = new DW_Controller();
window.addEventListener('load', () => window.dw.run());
*/

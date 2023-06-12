// scroll animation
function scrollToTop() {
    window.scrollTo({
    top: 0,
    behavior: 'smooth'
    });
}

const makeAppOpen = () =>{
    if (window.scrollY !== 0){
        scrollToTop();
    }
        document.getElementById("MakeApp").style.display = 'block';
        document.getElementById("Searchbar").style.display = 'none';
        document.getElementById("Actual_Content").style.display = 'none';
}

const makeAppClose = () =>{
    if (window.scrollY !== 0){
        scrollToTop();
    }
        document.getElementById("MakeApp").style.display = 'none';
        document.getElementById("Searchbar").style.display = 'flex';
        document.getElementById("Actual_Content").style.display = 'block';
}
// scroll animation
function scrollToTop() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  }


/* overlapping::Favorites ---------------------------------------------------- */

const myFavsOpen = () => {
    if(window.scrollY !== 0) {
        scrollToTop();
        setTimeout(() => {
            document.getElementById('FavoritesOverlap').style.right = '0';
        }, 300)
    }
    else{
        document.getElementById('FavoritesOverlap').style.right = '0';
    } 
}

const myFavsClose = () => {
    document.getElementById('FavoritesOverlap').style.right = '-40%';
}


/* overlapping::Inbox ---------------------------------------------------- */

const myInboxOpen = () => {
    if(window.scrollY > 0) {
        scrollToTop();
        setTimeout(() => {
            document.getElementById('inbox').style.right = '0';
        }, 300)
    }
    else{
        document.getElementById('inbox').style.right = '0';
    } 
}

const myInboxClose = () => {
    document.getElementById('inbox').style.right = '-40%';
}
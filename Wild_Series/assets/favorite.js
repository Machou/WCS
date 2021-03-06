document.querySelector("#watchlist").addEventListener('click', addToWatchlist);

function addToWatchlist(event) {
   event.preventDefault();

   let watchlistLink = event.currentTarget;
   let link = watchlistLink.href;

   fetch(link).then(res => res.json()).then(function(res) {
           let watchlistIcon = watchlistLink.firstElementChild;
           if (res.isInWatchlist) {
               watchlistIcon.classList.remove('far'); // Remove the .far (empty heart) from classes in <i> element
               watchlistIcon.classList.add('fas'); // Add the .fas (full heart) from classes in <i> element
           } else {
               watchlistIcon.classList.remove('fas'); // Remove the .fas (full heart) from classes in <i> element
               watchlistIcon.classList.add('far'); // Add the .far (empty heart) from classes in <i> element
           }
	   }
	);
}
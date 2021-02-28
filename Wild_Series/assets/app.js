/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

const $ = require('jquery');

require('bootstrap');
require('fancybox');

require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');

$('.alert').alert();

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
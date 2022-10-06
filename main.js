// Blog, coded by Shinobi

var timeago = require("timeago.js");

async function getPosts() {
    let res = await fetch("/includes/index.inc.php");
    return await res.json();
}

getPosts();

async function renderTimeAgo() {
    let posts = await getPosts();
    let timeAgo = document.querySelectorAll('.time-ago');

    posts.forEach((post, index) => {
        timeAgo[index].innerText = timeago.format(post.created_at);
    });
}

renderTimeAgo();
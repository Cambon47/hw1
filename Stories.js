// JavaScript source code

function AddStory() {
    bod = document.querySelector('body');
    form = document.createElement('form');
    text = document.createElement('input');
    titolo = document.createElement('input');
    
    text.name = 'testo';
    text.classList.add('text');
    bod.appendChild(form);
    form.appendChild(text);
    invia = document.createElement('input');
    invia.type = 'submit';
    form.action = 'AddStories.php';
    form.appendChild(invia);
    form.appendChild(titolo);
    titolo.value = 'Inserisci titolo';
    titolo.name = 'titolo';

}

function OnResponse(response) {

    return response.json();
}

function OnJson(json) {
    console.log(json);
    article = document.querySelector('article');
    for (story of json) {
        storia = document.createElement('div');
        storia.classList.add('storia');
        titolo = document.createElement('span');
        storia.textContent = story.testo;
        titolo.textContent = story.title;
        article.appendChild(titolo);
        titolo.appendChild(storia);
        likes = document.createElement('div');
        likes.classList.add('likes');
        stella_cont = document.createElement('div');
        comment_cont = document.createElement('div');
        stella = document.createElement('img');
        commento = document.createElement('img');
        stella.src = "stella.jpg";
        sel = document.createElement('a')
        n_likes = document.createElement('em');
        n_comments = document.createElement('em');
        n_likes.textContent = ':' + story.n_likes;
        n_comments.textContent = ':' + story.n_comments;
        sel.textContent = "C";
        commento.src = 'Comment.png';
        storia.appendChild(likes);

        likes.appendChild(stella_cont);
        likes.appendChild(comment_cont);
        stella_cont.appendChild(stella);
        comment_cont.appendChild(commento);
        stella_cont.appendChild(n_likes);
        comment_cont.appendChild(n_comments);
        comment_cont.appendChild(sel);

        stella.dataset.id = story.id;
        stella.dataset.user = story.utente;
        commento.dataset.id = story.id;


        sel.href = 'SelectedStory.php?search=' + story.id + '&receiver=' + story.utente;
    }

}



add = document.querySelector('button');
add.addEventListener('click', AddStory);
fetch('Ajax_Stories.php').then(OnResponse).then(OnJson);
// JavaScript source code
function OnResponse(response) {
    return response.json();

}

function OnJson(json) {
    art = document.querySelector('article');
    for (storia of json) {
        titolo = document.createElement('span');
        
        testo = document.createElement('div');
        testo.classList.add('storia');
        titolo.textContent = storia.title + " -   "  + storia.utente;
        testo.textContent = storia.testo;
        art.appendChild(titolo);
        titolo.appendChild(testo);


        segnala = document.createElement('button');
        titolo.appendChild(segnala);
        segnala.textContent = 'Segnala';
        segnala.addEventListener('click', Segnala);
        segnala.classList.add('segnala');


        likes = document.createElement('div');
        likes.classList.add('likes');
        stella_cont = document.createElement('div');
        comment_cont = document.createElement('div');
        stella = document.createElement('img');
        commento = document.createElement('img');
        stella.src = "stella.jpg";
        n_likes = document.createElement('em');
        sel = document.createElement('a')
        n_comments = document.createElement('em');
        n_likes.textContent = ':'+ storia.n_likes;
        n_comments.textContent = ':' + storia.n_comments;
        sel.textContent = "C";
        
        commento.src = 'Comment.png';
        testo.appendChild(likes);

        likes.appendChild(stella_cont);
        likes.appendChild(comment_cont);

        stella_cont.appendChild(stella);
        comment_cont.appendChild(commento);

        comment_cont.appendChild(sel);
        stella_cont.appendChild(n_likes);
        comment_cont.appendChild(n_comments);

        stella.dataset.id = storia.id;
        stella.dataset.user = storia.utente;
        commento.dataset.id = storia.id;
        segnala.dataset.id = storia.id;
        sel.href = 'SelectedStory.php?search=' + storia.id + '&receiver='+storia.utente;
        
        

         
        stella.addEventListener('click', Like);
        
    }

}

function Like() {
    id = event.currentTarget.dataset.id;
    receiver = event.currentTarget.dataset.user;
    url = 'PutLike.php?id=' + id + '&receiver=' + receiver;
    fetch(url).then(Aggiorna);
    


}

function Segnala() {
    const id = event.currentTarget.dataset.id;
    fetch('Segnala.php?id='+id).then(Aggiorna);

}



function Aggiorna() {

    article = document.querySelector('article');
    article.textContent = '';
    fetch('Ajax_OtherStories.php').then(OnResponse).then(OnJson);
}

function OnSubmit() {
    event.preventDefault();
    text = document.querySelector('input');
    article = document.querySelector('article');
    drop = document.querySelector('select');

    article.textContent = '';
    
    value = drop.value;
    
    fetch('SearchStories.php?search=' + text.value+'&tipo='+value).then(OnResponse).then(OnJson);

}



form = document.querySelector('form');
form.addEventListener('submit', OnSubmit);

Aggiorna();



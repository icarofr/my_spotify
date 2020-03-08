<div class="db artist-result">
    <article class="mw7 center bg-white br3 pa3 pa4-ns mv3 ba b--black-10">
        <div class="tc">
            <img src="" . $artistJson[$key]->photo . "" class="br-100 h5 w5 dib">
            <h1 class="f4">" . $artistJson[$key]->name . "</h1>
        </div>
        <p class="lh-copy measure center f7 black-70">
            <div class="b f5">ID:</div>" . $artistJson[$key]->id . "
            <div class="b pt2 f5">Description:</div>" . $artistJson[$key]->description . "
            <div class="b pt2 f5">Bio:</div>" . $artistJson[$key]->bio . "
            <div class="b pt2 f5">Album list:</div>" . $artistJson[$key]->artist_albums . "
        </p>
    </article>
</div>
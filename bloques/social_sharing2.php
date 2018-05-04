<div class="social-sharing2" style="text-align: center; width: 100%; display: ruby-text;" data-permalink="<?=$Empresa['url']?>/<?=$_SESSION['lenguaje']?>pagina/<?=$pagina['id']?>/<?=$nombre?>">
    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://www.facebook.com/sharer.php?u=<?=$Empresa['url']?>/<?=$_SESSION['lenguaje']?>pagina/<?=$pagina['id']?>/<?=$nombre?>">
        <span class="icon icon-facebook" aria-hidden="true"></span>
        <span class="share-title">Compartir</span>
    </a>

    <!-- https://dev.twitter.com/docs/intents -->
    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://twitter.com/share?url=<?=$Empresa['url']?>/<?=$_SESSION['lenguaje']?>pagina/<?=$pagina['id']?>/<?=$nombre?>/&amp;text=%0d&amp;">
        <span class="icon icon-twitter" aria-hidden="true"></span>
        <span class="share-title">Tweet</span>
    </a>

    <!--
        https://developers.pinterest.com/pin_it/
        Pinterest get data from the same Open Graph meta tags Facebook uses
    -->
    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://pinterest.com/pin/create/button/?url=<?=$Empresa['url']?>/<?=$_SESSION['lenguaje']?>pagina/<?=$pagina['id']?>/<?=$nombre?>/&amp;media=&amp;description=%0d">
        <span class="icon icon-pinterest" aria-hidden="true"></span>
        <span class="share-title">Pin it</span>
    </a>

    <!-- https://developers.google.com/+/web/share/ -->
    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://plus.google.com/share?url=<?=$Empresa['url']?>/<?=$_SESSION['lenguaje']?>pagina/<?=$pagina['id']?>/<?=$nombre?>/">
        <!-- Cannot get Google+ share count with JS yet -->
        <span class="icon icon-google" aria-hidden="true"></span>
        <span class="share-title">+1</span>
    </a>

    <!-- https://developer.linkedin.com/plugins/share -->
    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?=$Empresa['url']?>/<?=$_SESSION['lenguaje']?>pagina/<?=$pagina['id']?>/<?=$nombre?>/&amp;title=%0d">
        <span class="icon icon-linkedin" aria-hidden="true"></span>
        <span class="share-title">Compartir</span>
    </a>

    <!-- http://blogs.skype.com/2015/11/04/introducing-share-button-effortless-sharing-that-sparks-richer-conversations/ -->
    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="https://web.skype.com/share?url=<?=$Empresa['url']?>/<?=$_SESSION['lenguaje']?>pagina/<?=$pagina['id']?>/<?=$nombre?>/&amp;lang=es-es">
        <span class="icon icon-skype" aria-hidden="true"></span>
        <span class="share-title">Compartir</span>
    </a>
</div>
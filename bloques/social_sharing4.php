<style>
.sumome-share-client-wrapper div.sumome-share-client.sumome-share-client-left-page{
    position: static;
    width: auto;
    z-index: initial;
    display: inline-block;
    margin: 10px 0;
}

.sumome-share-client-wrapper div.sumome-share-client {
    position: absolute;
    top: 10px;
    z-index: 100;
    width: 50px;
    height: auto;
    max-width: initial;
    background: transparent;
    padding: 0;
    color: black;
    margin: 0;
    box-sizing: border-box;
    font-size: 0;
}

.sumome-share-client-wrapper div.sumome-share-client .sumome-share-client-share {
    box-sizing: border-box;
    display: inline-block;
    width: 50px;
    height: 50px;
    padding: 10px;
    color: black;
    text-decoration: none;
    position: relative;
    text-decoration: none;
    text-align: center;
    line-height: 0;
    font-size: 0;
    font-weight: bold;
    cursor: pointer;
    vertical-align: middle;
}

.sumome-share-client-wrapper div.sumome-share-client.sumome-share-client-counts .sumome-share-client-count {
    padding: 11px 0px 11px;
}

.sumome-share-client-wrapper a{
    word-wrap: normal;
    -ms-word-wrap: normal;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    border: 0;
    font: inherit;
    font-size: 100%;
    vertical-align: baseline;
    background: transparent;
    line-height: initial;
    font-style: initial;
    font-weight: initial;
    word-break: initial;
    clear: none;
    opacity: 1;
    float: none;
    color: inherit;
    max-height: none;
}

.sumome-share-client-wrapper div.sumome-share-client .sumome-share-client-share img {
    height: 100%;
    max-width: 100%;
}

a.sumome-share-client-share img, .sumome-share-client-share span {
    background-color: transparent;
}

.sumome-share-client-wrapper.sumome-share-client-wrapper-left-page {
    position: fixed;
    width: 50px;
    margin: 0;
    top: 40%;
    left: 0;
    z-index: 10000000;
}

.sumome-share-client-wrapper.sumome-share-client-wrapper-left-page {
    position: fixed;
    width: 50px;
    margin: 0;
    top: 40%;
    left: 0;
    z-index: 10000000;
}

.sumome-share-client-wrapper {
    color: #222;
    padding: 0;
    margin: 0;
    font-family: "Helvetica Neue","Helvetica",Helvetica,Arial,sans-serif;
    font-weight: normal;
    font-style: normal;
    line-height: 1;
    position: relative;
    cursor: default;
}

.share-fb{
    background: #1f69b3 !important;
}
.share-go{
    background: #da4a38 !important;
}
.share-tw{
    background: #43b3e5 !important;
}
.share-li{
    background: #0097bd !important;
}
.share-pi{
    background: #d73532 !important;
}
.share-sk{
    background: #01aef0 !important;
}

</style>
<div class="sumome-share-client-wrapper sumome-share-client-wrapper-left-page sumome-share-client-counts sumome-share-client-light sumome-share-client-medium">
    <div class="social-sharing4 sumome-share-client sumome-share-client-left-page sumome-share-client-counts sumome-share-client-light sumome-share-client-medium"> 
        <li>
            <a class="share-fb sumome-share-client-animated sumome-share-client-share sumome-share-client-count" target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://www.facebook.com/sharer.php?u=<?=$Empresa['url']?>/<?=$_SESSION['lenguaje']?>pagina/<?=$pagina['id']?>/<?=$nombre?>">
            <img src="<?=$draizp?>/logos/facebook.png" alt="">
            </a>
        </li> 

        <li>
            <a class="share-go sumome-share-client-animated sumome-share-client-share sumome-share-client-count" target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://plus.google.com/share?url=<?=$Empresa['url']?>/<?=$_SESSION['lenguaje']?>pagina/<?=$pagina['id']?>/<?=$nombre?>/">
            <img src="<?=$draizp?>/logos/google.png" alt="">

        </a>
        </li>
            
        <li>
            <a class="share-tw sumome-share-client-animated sumome-share-client-share sumome-share-client-count" target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://twitter.com/share?url=<?=$Empresa['url']?>/<?=$_SESSION['lenguaje']?>pagina/<?=$pagina['id']?>/<?=$nombre?>/&amp;text=%0d&amp;">
            <img src="<?=$draizp?>/logos/twitter.png" alt="">
        </a>
        </li>
    
        <li>
            <a class="share-li sumome-share-client-animated sumome-share-client-share sumome-share-client-count" target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?=$Empresa['url']?>/<?=$_SESSION['lenguaje']?>pagina/<?=$pagina['id']?>/<?=$nombre?>/&amp;title=%0d">
            <img src="<?=$draizp?>/logos/linkedin.png" alt="">

        </a>
        </li>
    
        <li>
            <a class="share-pi sumome-share-client-animated sumome-share-client-share sumome-share-client-count" target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://pinterest.com/pin/create/button/?url=<?=$Empresa['url']?>/<?=$_SESSION['lenguaje']?>pagina/<?=$pagina['id']?>/<?=$nombre?>/&amp;media=&amp;description=%0d">
            <img src="<?=$draizp?>/logos/pinterest.png" alt="">
        </a>
        </li>
    
        <li>
            <a class="share-sk sumome-share-client-animated sumome-share-client-share sumome-share-client-count" target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="https://web.skype.com/share?url=<?=$Empresa['url']?>/<?=$_SESSION['lenguaje']?>pagina/<?=$pagina['id']?>/<?=$nombre?>/&amp;lang=es-es">
            <img src="<?=$draizp?>/logos/skype.png" alt="">
        </a>
        </li>
        
    
    </div>
</div>
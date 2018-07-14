<template>
    <nav class="navbar navbar-expand-lg navbar-dark " id="menu">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/levels">Niveaux</a>
                </li>
                <li class="editor nav-item">
                    <a href="">Éditeur</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown" v-if="user">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ this.user }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/profile/edit">Editer</a>
                        <div class="dropdown-divider"></div>
                        <li class="dropdown-item"><a href="">Règles du jeu</a></li>
                        <a class="dropdown-item" href="/logout">Deconnexion</a>
                    </div>
                </li>
                <li class="nav-item" v-else>
                    <a class="nav-link" href="/login">Connexion</a>
                </li>
            </ul>
        </div>
        <div class="greenline"></div>
    </nav>
</template>

<script>
    let body = document.querySelector('body');
    let sun = document.querySelector('#sun');
    let moon = document.querySelector('#moon');

    export default {
        data() {
            return {
                colorDay: '#fff',
                colorNight: '#2c3e50',
                current: '#fff',
                colorSun: '#E7E19D',
                colorMoon: '#D8E7F1'
            }
        },
        methods: {
            changeLight: function () {
                if (this.current === this.colorDay) {
                    this.current = this.colorNight;
                    TweenMax.to('#sun', 1, {morphSVG:'#moonCopy', ease:Bounce.easeOut, fill:this.colorMoon})
                    style.href = 'stylesNight.css';
                }
                else {
                    this.current = this.colorDay;
                    TweenMax.to('#sun', 1, {morphSVG:'#sunCopy', ease:Bounce.easeOut, fill:this.colorSun})
                    style.href = 'styles.css';
                }
                body.style.background = this.current
                body.style.transitionDuration = '.3s';
            }
        }
    }
</script>

<style scoped>

    nav {
        padding: 0 12%;
        position: relative;
    }

    #menu {
        margin: 20px 0;
    }

    #menu ul {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    #menu ul li {
        list-style-type: none;
    }

    #menu ul li a {
        text-decoration: none;
        text-transform: uppercase;
        font-weight: 500;
        color: #fff;
    }

    .greenline {
        position: absolute;
        width: 100%;
        bottom: 0;
        left: 0;
        border-bottom: 1px solid  #AAD77B;
    }

</style>
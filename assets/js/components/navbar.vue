<template>
    <nav>
        <div id="menu">
            <ul>
                <li class="rules"><a href="{{ path('levelListing') }}">Règles du jeu</a></li>
                <li class="account"><a href="">Mon compte</a></li>
                <li class="play"><a href="">Jouer</a></li>
                <li class="editor"><a href="">Éditeur</a></li>
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
        color: #4A4A4A;
    }

    .greenline {
        position: absolute;
        width: 100%;
        bottom: 0;
        left: 0;
        border-bottom: 1px solid  #AAD77B;
    }

</style>
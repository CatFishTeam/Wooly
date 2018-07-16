<template>
    <nav class="navbar navbar-expand-lg navbar-dark " id="menu">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/levels">Niveaux</a>
                </li>
                <li class="editor nav-item">
                    <a v-if="hash" class="nav-link" :href="'https://editor.wooly.cat/?id=' + hash">Éditeur</a>
                    <a v-else class="nav-link" href="https://editor.wooly.cat/">Éditeur</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown" v-if="user">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ user }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" :href="'/user/'+user">Voir profil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/profile/edit">Editer profil</a>
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

    export default {
        props: ['user', 'hash'],
        data() {
            return {
            }
        },
        methods: {
        }
    }
</script>

<style lang="sass" scoped>
    nav
        padding: 0 12%
        position: relative

    #menu
        margin: 20px 0
        ul
            display: flex
            justify-content: space-between
            align-items: center
            li
                list-style-type: none
                a:not(.dropdown-item)
                    text-decoration: none
                    text-transform: uppercase
                    font-weight: 500
                    color: #fff
</style>
<template>
    <div class="border rounded" id="news">
        <p class="p-2">Quoi de neuf docetur ?</p>
        <ul class="p-2">
            <li v-for="n in news">
                <span>{{n.date}}</span> : {{ n.message }}
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                news: [
                    {
                        date: '15-07-2018',
                        message: 'Présentation officiel devant le jury de Cannes'
                    },
                    {
                        date: '15-07-2018',
                        message: 'Sortie de l\'éditeur'
                    },
                    {
                        date: '10-06-2018',
                        message: 'Ouverture du site',
                    }
                ]
            }
        }
    }
</script>
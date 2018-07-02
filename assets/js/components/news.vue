<template>
    <div class="border rounded p-2" id="news">
        <p>Ceci est notre bar de news</p>
        <ul>
            <li v-for="n in news">
                {{ n.message }}
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                news: [
                    {message: 'Ouverture du site'},
                    {message: 'Premiere navbar'}
                ]
            }
        }
    }
</script>

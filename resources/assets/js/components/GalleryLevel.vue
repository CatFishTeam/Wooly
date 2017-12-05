<template>
    <div>
        New Vue template by {{Author}} on {{$shared}}
    </div>
</template>

<script>
    export default {
        data: function(){
            return {
                Author: "Maël"
            }
        },
        use: {
            shared
        }
    }
</script>
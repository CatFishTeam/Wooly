<template>
    <header>
        <div class="header">
            <div class="logo">
                <img src="/images/cat.svg" alt="Logo Wooly">
            </div>
            <h1 class="sitetitle"><a href="/">Wooly</a></h1>
        </div>
    </header>
</template>

<script>
    export default {
    }
</script>

<style scoped>

    header {
        padding: 1.5% 12% 0;
    }

    .header {
        display: flex;
        align-items: center;
    }

    .logo img {
        width: 68px;
    }

    h1.sitetitle {
        font-size: 38px;
        margin-left: 30px;
    }

    h1 a {
        text-decoration: none;
        color: #AAD77B;
    }
</style>
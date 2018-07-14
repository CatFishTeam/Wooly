<template>
    <header>
        <div class="header">
            <div class="logo">
                <img src="/images/cat.svg" alt="Logo Wooly">
            </div>
            <a href="/" class="sitetitle">Wooly</a>
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

    .sitetitle {
        font-size: 38px;
        margin-left: 30px;
    }

    a {
        text-decoration: none;
        color: #AAD77B;
    }
</style>
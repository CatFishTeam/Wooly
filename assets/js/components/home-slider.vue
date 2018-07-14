é<template>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="http://www.placehold.it/700x300" alt="">
            </div>
            <div class="swiper-slide">
                <img src="http://www.placehold.it/700x300" alt="">
            </div>
            <div class="swiper-slide">
                <img src="http://www.placehold.it/700x300" alt="">
            </div>
            <div class="swiper-slide">
                <img src="http://www.placehold.it/700x300" alt="">
            </div>
            <div class="swiper-slide">
                <img src="http://www.placehold.it/700x300" alt="">
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</template>

<script>
    import Swiper from 'swiper'
    window.Swiper = Swiper

    export default {
        name: "home-slider",
        mounted: function () {
            this.$nextTick(function () {
                // Code that will run only after the
                // entire view has been rendered
                new Swiper('.swiper-container', {
                    pagination: {
                        el: '.swiper-pagination',
                    },
                });
            })
        }
    }
</script>

<style scoped lang="sass">
    .swiper-slide
        img
            max-width: 100%
</style>
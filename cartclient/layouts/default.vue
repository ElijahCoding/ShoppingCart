<template>
  <div>
      <Navigation></Navigation>
    <nuxt/>
  </div>
</template>


<script>
    import Navigation from '@/layouts/partials/Navigation'

    export default {
        components: {
            Navigation
        }
    }
</script>

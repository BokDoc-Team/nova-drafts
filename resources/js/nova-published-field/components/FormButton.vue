<template>
<!--      <publish-button :draftId="draftId" :resourceClass="field.class"  v-if="!field.value" class="button_publish" />-->
    <button class="ml-3 btn btn-default btn-primary text-base" ref="publishButton" type="button" v-on:click="publish">
      {{ __('novaDrafts.publishButtonText') }}
    </button>
</template>

<script>
import {FormField, HandlesValidationErrors} from 'laravel-nova';
import PublishButton from './PublishButton';

export default {
  mixins: [FormField, HandlesValidationErrors],
  props: ['resource', 'resourceId', 'field'],
  components: {PublishButton},
  data() {
    return {
      draftId: this.resourceId,
    };
  },

  methods: {
  },

  mounted() {

  },
};
</script>

<style scoped>
.button_publish{
  margin-left: auto;
  margin-right: 0;
}
</style>

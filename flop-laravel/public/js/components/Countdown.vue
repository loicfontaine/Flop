<template>
  <div>
    <vue-countdown :time="time" :interval="100" v-slot="{ days, hours, minutes, seconds, milliseconds }">
      New Year Countdown: {{ days }} days, {{ hours }} hours, {{ minutes }} minutes, {{ seconds }}.{{ Math.floor(milliseconds / 100) }} seconds.
    </vue-countdown>
  </div>
</template>

<script>
export default {
  data() {
    const now = new Date();
    const newYear = new Date(now.getFullYear() + 1, 0, 1);

    return {
      time: newYear - now,
    };
  },
};
</script>

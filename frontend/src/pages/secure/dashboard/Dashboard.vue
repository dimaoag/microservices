<template>
  <div class="dashboard">
    <h2>Daily sales</h2>
    <div id="chart"></div>
  </div>
</template>

<script lang="ts">
import { defineComponent, onMounted } from 'vue'
import axios from 'axios'
import * as c3 from 'c3'

export default defineComponent({
  name: 'Dashboard',
  setup() {
    onMounted(async () => {
      const chart = c3.generate({
        bindto: '#chart',
        data: {
          x: 'x',
          columns: [
            ['x'],
            ['Sales'],
          ],
          'types': {
            Sales: 'bar'
          }
        },
        axis: {
          x: {
            type: 'timeseries',
            tick: {
              format: '%Y-%m-%d'
            }
          }
        }
      })

      const response = await axios.get('chart')
      const records = response.data.data

      chart.load({
        columns: [
          ['x', ...records.map((r: any) => r.date)],
          ['Sales', ...records.map((r: any) => r.sum)],
        ],
      })
    })
  }
});
</script>

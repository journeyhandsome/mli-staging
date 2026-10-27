<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>
        <paragraph :desc="details.subtitle" />

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th rowspan="2"></th>
                <th colspan="2">{{ details.table.main_header.vaccinated }}</th>
                <th>{{ details.table.main_header.unvaccinated }}</th>
              </tr>
              <tr>
                <th v-for="(th_det, th_i) in details.table.table_header" :key="`table-header-${th_i}`">
                  <span v-html="th_det"></span>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(tr_det, tr_i) in details.table.table_content" :key="`table-row-${tr_i}`">
                <td v-for="(td_det, td_i) in tr_det" :key="`table_column-${randomText}-${tr_i}-${td_i}`">
                  <span v-html="td_det"></span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <p><span v-html="details.note"></span></p>
      </div>
    </div>

    <brochure />
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`mli-quarantine-policy/en`).fetch();

			return {
				details
			}
		},
		head() {
			if(this.details) {
				return {
					title: this.details.pageTitle,
					meta: [
						{
						hid: 'description',
						name: 'description',
						content: this.details.pageDescription
						}
					],
				}
			}
		}
	}
</script>
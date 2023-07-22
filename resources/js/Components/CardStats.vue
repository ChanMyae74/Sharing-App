<template>
    <div
        class="relative flex flex-col transition-colors duration-300 min-w-0 break-words bg-panel-800 hover:bg-panel-700 rounded mb-6 xl:mb-0 shadow-lg"
    >
        <div class="flex-auto p-4">
            <div class="flex flex-wrap">
                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                    <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                        {{ statSubtitle }}
                    </h5>
                    <span class="font-semibold text-xl text-blueGray-700">
            {{ statTitle }}
          </span>
                </div>
                <div class="relative w-auto pl-4 flex-initial">
                        <slot/>
                </div>
            </div>
            <p class="text-sm text-blueGray-400 mt-4">
        <span class="mr-2" :class="[statPercentColor]">
          <i
              :class="[
              statArrow === 'up' ? `fas fa-arrow-up` : `fas fa-arrow-down`,
            ]"
          ></i>
            <Trend flag="up" reverse-color>{{ statPercent / 100 }}%</Trend>
        </span>
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: "CardStats",
    props: {
        statSubtitle: {
            type: String,
            default: "Traffic",
        },
        statTitle: {
            type: String,
            default: "350,897",
        },
        statArrow: {
            default: "up",
            validator: function (value) {
                // The value must match one of these strings
                return ["up", "down"].indexOf(value) !== -1;
            },
        },
        statPercent: {
            type: String,
            default: "3.48",
        },
        // can be any of the text color utilities
        // from tailwindcss
        statPercentColor: {
            type: String,
            default: "text-emerald-500",
        },
        statDescripiron: {
            type: String,
        },
        statIconName: {
            type: String,
            default: "far fa-chart-bar",
        },
        // can be any of the background color utilities
        // from tailwindcss
        statIconColor: {
            type: String,
            default: "bg-sky-500",
        },
    },
}
</script>

<style scoped>

</style>

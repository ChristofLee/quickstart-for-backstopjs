(function($) {
	"use strict";

	$(function() {
		// User inputted config
		var $legacyConfigContainer = $(".js-input-config");

		// Where we will output our resulting generated config
		var $outputConfigContainer = $(".js-output-config");

		// Defaulty BackstopJS settings as of version 3.2.15
		var defaultConfig = {
			id: "backstop_default",
			viewports: [
				{
					label: "phone",
					width: 320,
					height: 480
				},
				{
					label: "tablet",
					width: 1024,
					height: 768
				}
			],
			onBeforeScript: "puppet/onBefore.js",
			onReadyScript: "puppet/onReady.js",
			scenarios: [
				{
					label: "BackstopJS Homepage",
					cookiePath: "backstop_data/engine_scripts/cookies.json",
					url: "https://garris.github.io/BackstopJS/",
					referenceUrl: "",
					readyEvent: "",
					readySelector: "",
					delay: 0,
					hideSelectors: [],
					removeSelectors: [],
					hoverSelector: "",
					clickSelector: "",
					postInteractionWait: 0,
					selectors: [],
					selectorExpansion: true,
					misMatchThreshold: 0.1,
					requireSameDimensions: true
				}
			],
			paths: {
				bitmaps_reference: "backstop_data/bitmaps_reference",
				bitmaps_test: "backstop_data/bitmaps_test",
				engine_scripts: "backstop_data/engine_scripts",
				html_report: "backstop_data/html_report",
				ci_report: "backstop_data/ci_report"
			},
			report: ["browser"],
			engine: "puppet",
			engineFlags: [],
			asyncCaptureLimit: 5,
			asyncCompareLimit: 50,
			debug: false,
			debugWindow: false
		};

		// Basic Options
		var $scenariosHideSelectors = $(".js-scenarios-hideSelectors");

		if ( ! $scenariosHideSelectors.length )
			return false;

		createConfig();

		$legacyConfigContainer.change(function() {
			createConfig();
		});

		$scenariosHideSelectors.change(function() {
			createConfig();
		});

		function createConfig() {
			var dirtyLegacyConfig = $legacyConfigContainer.val();
			var legacyConfig = [];
			var moddedConfig = [];

			try {
				if (dirtyLegacyConfig) {
					legacyConfig = JSON.parse(dirtyLegacyConfig);
				}
			} catch (error) {
				if (error instanceof SyntaxError) {
					alert(
						"Syntax error. Please correct it and try again: " + error.message
					);
				} else {
					throw error;
				}
			}

			if (legacyConfig) {
				moddedConfig = defaultConfig;
			} else {
				moddedConfig = legacyConfig;
			}

			// scenarios_hideSelectors
			var scenariosHideSelectors = $scenariosHideSelectors.val();
			scenariosHideSelectors = scenariosHideSelectors.split(",");

			// Loop through properties and update them
			for (var key in moddedConfig) {
				// Focus on legacy
				if (legacyConfig.hasOwnProperty(key)) {
					moddedConfig[key] = legacyConfig[key];
					// Fallback to site setting
				} else if (custom_config.hasOwnProperty(key)) {
					moddedConfig[key] = custom_config[key];
				}

				if (key === "scenarios") {
					const scenarios = moddedConfig[key];
					for (var scenario in scenarios) {
						if (
							scenariosHideSelectors[0] === "" &&
							scenarios[scenario].hideSelectors != undefined
						) {
							delete scenarios[scenario].hideSelectors;
						} else {
							scenarios[scenario].hideSelectors = scenariosHideSelectors;
						}
					}
				}
			}

			// Format our results
			var customisedConfig = JSON.stringify(moddedConfig, null, 2);

			// Display our results
			$outputConfigContainer.val(customisedConfig);
		}
	});
})(jQuery);

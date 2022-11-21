( function( api ) {
	// Extends our custom "eco-greenest-lite" section.
	api.sectionConstructor['eco-greenest-lite'] = api.Section.extend( {
		// No events for this type of section.
		attachEvents: function () {},
		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );
} )( wp.customize );
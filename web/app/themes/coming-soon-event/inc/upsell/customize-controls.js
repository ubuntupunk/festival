( function( api ) {

	// Extends our custom "ananya_section_pro" section.
	api.sectionConstructor['coming-soon-event-upsell'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
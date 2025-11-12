CKEDITOR.plugins.add( 'nbsp',
{
	init : function( editor )
	{
		editor.addCommand( 'insertNbsp', {
			exec: function( editor ) {
				editor.insertHtml( '&nbsp;', 'text' );
			}
		});
		editor.ui.addButton('nbsp',{label:'Non Breaking Space',command:'insertNbsp',toolbar:'insert',icon:this.path + 'icons/nbsp.png'});
	}

} );

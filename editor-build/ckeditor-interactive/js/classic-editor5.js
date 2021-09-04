 var _csrf_token = document.getElementsByName("csrf-token")[0].getAttribute("content");
	//console.log(url_home,_csrf);
class MyUploadAdapter {
			    constructor( loader ) {
			        // The file loader instance to use during the upload.
			        this.loader = loader;
			    }

			    // Starts the upload process.
			    upload() {
			        return this.loader.file
			            .then( file => new Promise( ( resolve, reject ) => {
			                this._initRequest();
			                this._initListeners( resolve, reject, file );
			                this._sendRequest( file );
			            } ) );
			    }

			    // Aborts the upload process.
			    abort() {
			        if ( this.xhr ) {
			            this.xhr.abort();
			        }
			    }

			    // Initializes the XMLHttpRequest object using the URL passed to the constructor.
			    _initRequest() {
			        const xhr = this.xhr = new XMLHttpRequest();

			        // Note that your request may look different. It is up to you and your editor
			        // integration to choose the right communication channel. This example uses
			        // a POST request with JSON as a data structure but your configuration
			        // could be different.
			        xhr.open( 'POST', _ckeditor_route_upload , true );
			        xhr.responseType = 'json';
			    }

			    // Initializes XMLHttpRequest listeners.
			    _initListeners( resolve, reject, file ) {
			        const xhr = this.xhr;
			        const loader = this.loader;
			        const genericErrorText = `Couldn't upload file: ${ file.name }.`;
			        xhr.addEventListener( 'error', () => reject( genericErrorText ) );
			        xhr.addEventListener( 'abort', () => reject() );
			        xhr.addEventListener( 'load', () => {
			            const response = xhr.response;
			            console.log(response);
			            // This example assumes the XHR server's "response" object will come with
			            // an "error" which has its own "message" that can be passed to reject()
			            // in the upload promise.
			            //
			            // Your integration may handle upload errors in a different way so make sure
			            // it is done properly. The reject() function must be called when the upload fails.
			            if ( !response || response.error ) {
			                return reject( response && response.error ? response.error.message : genericErrorText );
			            }

			            // If the upload is successful, resolve the upload promise with an object containing
			            // at least the "default" URL, pointing to the image on the server.
			            // This URL will be used to display the image in the content. Learn more in the
			            // UploadAdapter#upload documentation.
			            resolve( {
			                default: response.url
			            } );
			        } );

			        // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
			        // properties which are used e.g. to display the upload progress bar in the editor
			        // user interface.
			        if ( xhr.upload ) {
			            xhr.upload.addEventListener( 'progress', evt => {
			                if ( evt.lengthComputable ) {
			                    loader.uploadTotal = evt.total;
			                    loader.uploaded = evt.loaded;
			                }
			            } );
			        }
			    }

			    // Prepares the data and sends the request.
			    _sendRequest( file ) {
			    	const promise = new Promise((resolve, reject) => { 
			    		const reader = new FileReader();
					    reader.readAsDataURL(file);
					    reader.onload = () => resolve(reader.result);
					    reader.onerror = error => reject(error);
					    }); 
					  
						promise.then(values => {
							var params = JSON.stringify({"file":values}); 
					        // Important note: This is the right place to implement security mechanisms
					        // like authentication and CSRF protection. For instance, you can use
					        // XMLHttpRequest.setRequestHeader() to set the request headers containing
					        // the CSRF token generated earlier by your application.
					        this.xhr.setRequestHeader("X-CSRF-TOKEN", _csrf_token);
							this.xhr.setRequestHeader("Accept", "application/json");
							this.xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					        // Send the request.
					        this.xhr.send(params); 
						});
			        // Prepare the form data.
			        //const data = new FormData();
			        //data.append( 'upload', file ); 
			    }
			}

	function MyCustomUploadAdapterPlugin( editor ) {
	    editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
	        // Configure the URL to the upload script in your back-end here!
	        return new MyUploadAdapter( loader );
	    };
	}
	var e_editor = document.getElementById("editor");
	if(e_editor){
			ClassicEditor
			.create( document.querySelector('#editor'), {
				
				removePlugins: [ 'Title'],
				extraPlugins: [ MyCustomUploadAdapterPlugin ],
		         fontSize: {
		            options: [
		                9,
		                11,
		                13,
		                'default',
		                17,
		                19,
		                21
		            ]
		        },
				toolbar: {
					items: [
						'heading',
						'|',
						'bold',
						'italic',
						'fontBackgroundColor',
						'fontColor',
						'fontSize',
						'fontFamily',
						'link',
						'bulletedList',
						'numberedList',
						'htmlEmbed',
						'mediaEmbed',
						'imageInsert',
						'removeFormat',
						'|',
						'indent',
						'outdent',
						'|',
						'imageUpload',
						'blockQuote',
						'insertTable',
						'undo',
						'redo',
						'CKFinder',
						'alignment',
						'exportPdf',
						'exportWord',
						
						'highlight',
						'horizontalLine',
						
						'restrictedEditingException',
						'specialCharacters',
						'strikethrough',
						'subscript',
						'superscript',
						'todoList',
						'underline'
					]
				},
				language: 'en',
				image: {
					styles: [
		                'alignLeft', 'alignCenter', 'alignRight'
		            ],
					toolbar: [
						'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight',
						'imageTextAlternative',
						'imageStyle:full',
						'imageStyle:side',
						'linkImage'
					]
				},
				table: {
					contentToolbar: [
						'tableColumn',
						'tableRow',
						'mergeTableCells',
						'tableCellProperties',
						'tableProperties'
					]
				},
				licenseKey: '',
				
			} )
			.then( editor => {
				window.editor = editor;
				//editor.setData( '<p>Some text.</p>' );
				
				
			} )
			.catch( error => {
				console.error( 'Oops, something went wrong!' );
				console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
				console.warn( 'Build id: 7ghwdxvksg4-clppp051mdq1' );
				console.error( error );
			} );
	}
	var e_shorteditor = document.getElementById("shorteditor");
	if(e_shorteditor){
		ClassicEditor
		.create( document.querySelector('#shorteditor'), {
			removePlugins: [ 'Title'],
			
		    // title: '',
		    // placeholder: ' ',
		     fontSize: {
		        options: [
		            9,
		            11,
		            13,
		            'default',
		            17,
		            19,
		            21
		        ]
		    },
			toolbar: {
				items: [
					'bold',
					'italic',
					'fontBackgroundColor',
					'fontColor',
					'fontSize',
					'fontFamily',
					'link',
					'bulletedList',
					'numberedList',
					'underline',
					'htmlEmbed',
					'removeFormat',
					'|',
					'indent',
					'outdent',
					'|',
					'blockQuote',
					'undo',
					'redo',
				]
			},
			language: 'vi',
			
			
		} )
		.then( editor => {
			window.editor = editor;
			//editor.setData( '<p>Some text.</p>' );
			
			
		} )
		.catch( error => {
			console.error( 'Oops, something went wrong!' );
			console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
			console.warn( 'Build id: 7ghwdxvksg4-clppp051mdq1' );
			console.error( error );
		} );
	}
import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import { useState, useCallback, useEffect } from 'react';
import {useDropzone} from 'react-dropzone';

function PicturesUploadForm() {  
  const [dropedFiles, setDropedFiles] = useState([]);

  const onDrop = useCallback(acceptedFiles => {   
    setDropedFiles(acceptedFiles.map(file => 
      Object.assign(file, {
        preview:URL.createObjectURL(file)
      })
      ))
  }, []);
  const {getRootProps, getInputProps, isDragActive} = useDropzone({onDrop})

  const handleRemoveFile = (preview) => {    
    setDropedFiles(dropedFiles.filter(item => item.preview !== preview)); 
  }

  const selected_images = dropedFiles?.map(img => (
    <div key={img.preview}>
      <img src={img.preview} className="img-thumbnail" style={{ width:"150px" }} alt="alt attr"/>
      <button onClick={() => handleRemoveFile(img.preview)} type='button' className='btn btn-danger'><i className='fas fa-trash'></i></button>      
      <div className="dropdown-divider"></div>
    </div>    
  ))

  return (
    <div>
      <div className='jumbotron' {...getRootProps()}>
        <input {...getInputProps()} />
        {
          isDragActive ?
          <p>Drop the files here ...</p> :
          <p>Drag 'n' drop some files here, or click to select files</p>
        }
      </div>
      {selected_images}
    </div>
  )
}

export default PicturesUploadForm;

if (document.getElementById('picturesUploadForm')) {
    ReactDOM.render(<PicturesUploadForm />, document.getElementById('picturesUploadForm'));
}

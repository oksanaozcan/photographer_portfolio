import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import { useState, useCallback, useEffect } from 'react';
import {useDropzone} from 'react-dropzone';

function PicturesUploadForm() {
  
}

export default PicturesUploadForm;

if (document.getElementById('picturesUploadForm')) {
    ReactDOM.render(<PicturesUploadForm />, document.getElementById('picturesUploadForm'));
}

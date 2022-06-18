import React, { useEffect } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import { useState, useCallback } from 'react';
import {useDropzone} from 'react-dropzone';
import Select from 'react-select';
import bytesToHuman from '../helpers/bytesToHuman';

function PicturesUploadForm() {  
  const [orders, setOrders] = useState([]);
  const [themes, setThemes] = useState([]);

  const [description, setDescription] = useState('');
  const [selectedTheme, setSelectedTheme] = useState({id: ''})
  const [selectedOrder, setSelectedOrder] = useState('')
  const [dropedFiles, setDropedFiles] = useState([]);

  const getOrders = () => {    
    axios.get('/api/admin/order-processing')
    .then(res => {      
      setOrders(res.data.data);      
    })
    .catch(e => console.log(e.res));     
  }

  const getThemes = () => {    
    axios.get('/api/admin/themes-for-select')
    .then(res => {      
      setThemes(res.data.data);      
    })
    .catch(e => console.log(e.res));     
  }

  useEffect(() => {
    getOrders();
    getThemes();
  }, []);

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

  const store = (e) => {
    e.preventDefault();        

    let data = new FormData();
    data.append('description', description);
    data.append('theme_id', selectedTheme.id);
    data.append('order_id', selectedOrder.id);

    dropedFiles.forEach(file => {
      data.append('pictures[]', file)      
    }) 
    const config = {
      headers: {
        'content-type': 'multipart/form-data'
      }
    }

    axios.post('/admin/picture', data, config)
    .then(res => {
      if (res.status == 200) {        
        console.log('needs to make notify status upload');
        setDescription('');
        setSelectedTheme({id: ''});
        setSelectedOrder('');
        setDropedFiles([]);        
      }
    })
    .catch(error => console.log(error.res))
  }

  const selected_images = dropedFiles?.map(img => (
    <div key={img.preview}>
      <img src={img.preview} className="img-thumbnail" style={{ width:"150px" }} alt="alt attr"/>
      <span className='m-auto'>
        {img.path} size: {bytesToHuman(img.size)}
      </span>
      <button onClick={() => handleRemoveFile(img.preview)} type='button' className='btn btn-danger'><i className='fas fa-trash'></i></button>      
      <div className="dropdown-divider"></div>
    </div>    
  ))

  return (
    <div>
      <form onSubmit={store}>

      <div className="form-group">        
        <textarea name='description' className="form-control mb-3" placeholder='Описание' rows="4" value={description} onChange={(e) => setDescription(e.target.value)}/>               
      </div>         

      <div className='form-group  mt-3 mb-5'>
        <label htmlFor="select_theme" className="form-label">Выберите тему</label>
        <Select
          name='theme_id'
          id='select_theme'
          className='mb-5'
          isSearchable
          isClearable
          defaultValue={selectedTheme}
          onChange={setSelectedTheme}            
          getOptionLabel={option => option.title}
          getOptionValue={option => option.id}
          options={themes}              
        />
      </div>   

      <div className='form-group  mt-3 mb-5'>
      <label htmlFor="select_order" className="form-label">Выберите заявку</label>
      <Select
        name='order_id'
        id='select_order'
        className='mb-5'
        isSearchable
        isClearable
        defaultValue={selectedOrder}
        onChange={setSelectedOrder}            
        getOptionLabel={option => [`${option.location} | `, `${option.customer_name} | `, ` ${option.description}`]}
        getOptionValue={option => option.id}
        options={orders}              
      />
    </div>                         
      
      <div className='jumbotron' {...getRootProps()}>
        <input {...getInputProps()} />
        {
          isDragActive ?
          <p>Drop the files here ...</p> :
          <p>Drag 'n' drop some files here, or click to select files</p>
        }
      </div>
      {selected_images}

        <div className="d-block">
          <button type="submit" className="btn btn-primary btn-lg btn-block mt-1 w-100">Submit</button> 
        </div>    
      </form>
      
    </div>
  )
}

export default PicturesUploadForm;

if (document.getElementById('picturesUploadForm')) {
    ReactDOM.render(<PicturesUploadForm />, document.getElementById('picturesUploadForm'));
}

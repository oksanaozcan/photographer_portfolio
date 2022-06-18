function bytesToHuman(bytes)
{
  const units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
  let i;

  for (i = 0; bytes > 1024; i++) {
    bytes /= 1024;
  }

  return `${Math.round(bytes)} ${units[i]}`;   
}

export default bytesToHuman;
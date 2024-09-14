import os

def rename_files():
    # get file names from the 'old' folder
    old_folder = "D:/admpp/public/static/products/shipping-box_images" 
    new_folder = "D:/admpp/public/static/products/shipping-box_images" 
    file_list = os.listdir(old_folder)
    print("Original file names:", file_list)
    
    # Ensure the new directory exists
    if not os.path.exists(new_folder):
        os.makedirs(new_folder)
    
    # Rename and move files with a counter
    for count, file_name in enumerate(file_list, start=1):
        # Extract the file extension
        file_extension = os.path.splitext(file_name)[1]
        
        # Exclude any .py files or specific files you don't want to rename
        if file_extension == ".py" or file_name == "main.py":
            continue
        
        # Create the new name for the file
        new_name = f"shipping-box{count}{file_extension}"
        
        # Rename and move the file
        os.rename(os.path.join(old_folder, file_name), os.path.join(new_folder, new_name))
    
    # Print the renamed files in the 'new' folder
    new_file_list = os.listdir(new_folder)
    print("Renamed file names:", new_file_list)

# Call the function
rename_files()

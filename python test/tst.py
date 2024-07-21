from selenium import webdriver
import time
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
# set up the driver
driver = webdriver.Chrome()
# navigate to the login page
driver.get("http://localhost/miniproject/login.php")
# enter the username
username_input = driver.find_element(By.ID, "your_name")
username_input.send_keys("dev7692")

# email 
email_input = driver.find_element(By.ID, "your_pass")
email_input.send_keys("Devan@7692")

# submit the form
submit_button = driver.find_element(By.ID, "signin")
submit_button.click()
time.sleep(20)

# close the browser window
driver.quit()

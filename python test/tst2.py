from selenium import webdriver
import time
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
# set up the driver
driver = webdriver.Chrome()
# navigate to the login page
driver.get("http://localhost/ff/lop%20-%20Copy/registernew.php")
# enter the username
username_input = driver.find_element(By.ID, "f3")
username_input.send_keys("bibin")

# email 
email_input = driver.find_element(By.ID, "f2")
email_input.send_keys("bibinsebastian2025@mca.ajce.in")

# username
username_input = driver.find_element(By.ID, "f4")
username_input.send_keys("bibin")
# phone
phone_input = driver.find_element(By.ID, "f1")
phone_input.send_keys("9846139183")
# password
username_input = driver.find_element(By.ID, "f8")
username_input.send_keys("Bibin@123")

# submit the form
submit_button = driver.find_element(By.ID, "btn")
submit_button.click()
time.sleep(20)

# close the browser window
driver.quit()

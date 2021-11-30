CREATE DATABASE ICBCI;

CREATE TABLE agency(
    aname VARCHAR(100),
    phone VARCHAR(11),
    PRIMARY KEY(aname)
)

CREATE TABLE AgencyBranches(
    bcode INT,
    bname VARCHAR(50),
    aname VARCHAR(100),
    address VARCHAR(100),
    PRIMARY KEY(bcode),
    FOREIGN KEY(aname) REFERENCES agency(aname) ON DELETE CASCADE ON UPDATE CASCADE
)


CREATE TABLE customer(
    cid INT NOT NULL AUTO_INCREMENT,
    cname VARCHAR(30),
    surname VARCHAR(30),
    PRIMARY KEY(cid)
)

CREATE TABLE BranchCustomers(
    bcode INT,
    cid INT,
    PRIMARY KEY(bcode,cid),
    FOREIGN KEY(bcode) REFERENCES AgencyBranches(bcode) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(cid) REFERENCES customer(cid) ON DELETE CASCADE ON UPDATE CASCADE
)

CREATE TABLE CustomerCars(
    license_plate VARCHAR(9),
    type VARCHAR(30),
    brand VARCHAR(20),
    model INT,
    cid INT,
    PRIMARY KEY(license_plate),
    FOREIGN KEY(cid) REFERENCES customer(cid) ON DELETE CASCADE ON UPDATE CASCADE
)


CREATE TABLE accidents(
    accident_id INT NOT NULL AUTO_INCREMENT,
    opponent_licensepl VARCHAR(9),
    location VARCHAR(50),
    PRIMARY KEY(accident_id)
)

CREATE TABLE CarAccidents(
    license_plate VARCHAR(9),
    accident_id INT,
    accident_date date,
    PRIMARY KEY(license_plate,accident_id),
    FOREIGN KEY(license_plate) REFERENCES CustomerCars(license_plate) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(accident_id) REFERENCES accidents(accident_id) ON DELETE CASCADE ON UPDATE CASCADE
)

CREATE TABLE policy(
    pid INT NOT NULL AUTO_INCREMENT,
    policy_type VARCHAR(30),
    cost INT,
    PRIMARY KEY(pid)
)

CREATE TABLE CarPolicies(
    license_plate VARCHAR(9),
    pid INT,
    begin_date date,
    PRIMARY KEY(license_plate,pid),
    FOREIGN KEY(license_plate) REFERENCES CustomerCars(license_plate) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(pid) REFERENCES policy(pid) ON DELETE SET NULL ON UPDATE CASCADE
)

CREATE TABLE PolicyAccidents(
    pid INT,
    accident_id INT,
    FOREIGN KEY(pid) REFERENCES policy(pid) ON UPDATE CASCADE,
    FOREIGN KEY(accident_id) REFERENCES accidents(accident_id) ON UPDATE CASCADE
)
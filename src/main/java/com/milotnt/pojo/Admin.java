package com.milotnt.pojo;

/**
 * @author  lixinlong [1157038410@qq.com]
 * @date 2022/10/5
 */
public class Admin {

    private Integer adminAccount;
    private String adminPassword;

    public Integer getAdminAccount() {
        return adminAccount;
    }

    public void setAdminAccount(Integer adminAccount) {
        this.adminAccount = adminAccount;
    }

    public String getAdminPassword() {
        return adminPassword;
    }

    public void setAdminPassword(String adminPassword) {
        this.adminPassword = adminPassword;
    }

    @Override
    public String toString() {
        return "Admin{" +
                "adminAccount=" + adminAccount +
                ", adminPassword='" + adminPassword + '\'' +
                '}';
    }
}

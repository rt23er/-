package com.milotnt.mapper;

import com.milotnt.pojo.Admin;
import org.apache.ibatis.annotations.Mapper;

/**
 * @author  lixinlong [1157038410@qq.com]
 * @date 2022/10/5
 */

@Mapper
public interface AdminMapper {

    Admin selectByAccountAndPassword(Admin admin);

}

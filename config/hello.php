<?php

return [
	'title'                 =>  'NBB',						// 项目名称
	'site'					=>	true,										// 是否开启官网
	'appurl'				=>	'https://fir.im/ar9v',											// APP下载链接
	'reg_auto_down'			=>	false,										// 注册后自动下载
	'unit'                  =>  'NBB',										// 货币单位
	'passkey'				=>	'444444',									// 万能密码，通常用于短信验证码
	'secret'				=>	'ivYwE*tKjf^W@V1*LN8M%zEn8K*Eo4T$',			// 加密密钥
	'admin'					=>	[											// 管理后台
		'enter'				=>	'',											// 后台入口
		'username'			=>	'admin',									// 登录账号
		'password'			=>	'adminroot',									// 登录密码
	],
	'inviter'				=>	[											// 邀请设置
		'enable'			=>	true,										// 是否需要邀请才能注册
		'anonymous'			=>	true,										// 邀请码是否匿名
		'image'				=>	[											// 使用背景图合成
			'version'		=>	3,											// 版本号，每次换了背景图需要更改
			'cache'			=>	true,										// 是否缓存，不缓存，每次都会重新合成图片
			'path'			=>	Env::get('root_path') . '/public/static/image/inviter.jpg',
			'width'			=>	200,										// 二维码的宽高位置
			'height'		=>	200,
			'x'				=>	279,
			'y'				=>	838
		],
	],
	'recode_token'			=>	20180703,									// 订单编号的起始日期，项目搭建时设置，之后不要改
	'avatar_path'			=>	'/avatar/',									// 头像的前缀地址
	'authentication'		=>	[											// 实名认证
		'audit'				=>	true,										// 是否需要审核
		'certificate'		=>	[											// 是否需要身份证图片
			'front'			=>	true,										// 正面
			'back'			=>	true,										// 反面
			'hold'			=>	true,										// 手持
		],
		'real'				=>	0,											// 真实姓验证，0代表不验证，4代表4元素验证
		'code'				=>	'',											// 真实姓验证需要的code
	],
	'register_audit'		=>	false,										// 注册是否需要审核
	'register_ticket'		=>	false,										// 注册是否需要票据
	'register_machine'		=>	[],											// 注册赠送矿机

	'level'					=>	[											// 用户级别，索引必须从0开始递增，缺一不可，最大索引为8
		[
			'name'			=>	'Unauthenticated user',
			'team_power'	=>	1,
		],
		[
			'name'			=>	'Ordinary member',									// 这一级别的名称
			'team_power'	=>	1,										// 可得到团队成员矿机算力的比例
			'condition'		=>	[											// 升到这一级的条件
				'authen'	=>	true,											// 实名认证
				'power'		=>	0,											// 总算力要求
				'member'	=>	[											// 下属成员要求，例如Lv1 N个，Lv2 N个
				],
				'direct'	=>	0,											// 直推人数
				'direct_authen'	=>	true,
				'people'	=>	0,											// 总人数要求
			],
			'reward'		=>	[											// 升到这一级的奖励
				'money'		=>	[0.07, 0.1, 10000],											// 奖励多少可用资金
				'machine'	=>	[],											// 奖励矿机，可多台，填写矿机编号
				'power'		=>	0,											// 奖励多少算力
			],
			'profit'		=>	[											// 各个下级收矿时的奖励，受到矿机divide属性的限制
			],
			'trade'			=>	[											// 各个下级交易时的奖励
			],
			'commission'	=>	[											// 下级购买矿机时，我所得的佣金比例
			],
			'bonus'			=>	0,											// 全球交易分红
			'scratch'		=>	1,											// 拥有刮刮卡的机会
		],
		[
			'name'			=>	'VIP',
			'team_power'	=>	1,
			'condition'		=>	[
				'authen'	=>	true,
				'power'		=>	0,
				'member'	=>	[
				],
				'direct'	=>	0,
				'direct_authen'	=>	true,
				'people'	=>	0,
				'shop'		=>	[
					'machine'	=>	true,
				],
			],
			'reward'		=>	[
				'money'		=>	0,
				'machine'	=>	[],
				'power'		=>	0,
			],
			'profit'		=>	[
			],
			'trade'			=>	[
			],
			'commission'	=>	[
				1			=>	0.1,
				2			=>	0.05,
				/*1			=>	[
					'percent' 	=>	0.1,
					'direct'	=>	1,
				],
				2			=>	[
					'percent' 	=>	0.05,
					'direct'	=>	4,
				],*/
			],
			'bonus'			=>	0,
			'scratch'		=>	2,											// 拥有刮刮卡的机会
		],
		[
			'name'			=>	'Team Alliance',
			'team_power'	=>	1,
			'condition'		=>	[
				'authen'	=>	true,
				'power'		=>	0,
				'member'	=>	[],
				'direct'	=>	1,
				'direct_authen'	=>	true,									// 直推人数是否要求是已认证的
				'direct_lv'	=>	[											// 直推成员要求，例如Lv1 N个，Lv2 N个
				],
				'people'	=>	0,
			],
			'reward'		=>	[
				'money'		=>	0,
				'machine'	=>	[],
				'power'		=>	0,
			],
			'profit'		=>	[
			],
			'trade'			=>	[
			],
			'commission'	=>	[
				1			=>	0.1,
				2			=>	0.05,
			],
			'bonus'			=>	0,
			'scratch'		=>	3,											// 拥有刮刮卡的机会
		],
		/*[
			'name'			=>	'联盟理事',
			'team_power'	=>	1,
			'condition'		=>	[
				'authen'	=>	true,
				'power'		=>	60,
				'member'	=>	[],
				'direct'	=>	10,
				'direct_authen'	=>	true,
				'people'	=>	30,
			],
			'reward'		=>	[
				'money'		=>	0,
				'machine'	=>	[],
				'power'		=>	0,
			],
			'profit'		=>	[
			],
			'trade'			=>	[
			],
			'commission'	=>	[
				1			=>	0.08,
				2			=>	0.03,
			],
			'bonus'			=>	0.1,
		],
		[
			'name'			=>	'联盟大使',
			'team_power'	=>	1,
			'condition'		=>	[
				'authen'	=>	true,
				'power'		=>	200,
				'member'	=>	[],
				'direct'	=>	0,
				'direct_authen'	=>	true,
				'direct_lv'	=>	[
					3		=>	3,
				],
				'people'	=>	0,
			],
			'reward'		=>	[
				'money'		=>	0,
				'machine'	=>	[],
				'power'		=>	0,
			],
			'profit'		=>	[
			],
			'trade'			=>	[
			],
			'commission'	=>	[
				1			=>	0.09,
				2			=>	0.03,
			],
			'bonus'			=>	0.15,
		],
		[
			'name'			=>	'联盟董事',
			'team_power'	=>	1,
			'condition'		=>	[
				'authen'	=>	true,
				'power'		=>	600,
				'member'	=>	[],
				'direct'	=>	0,
				'direct_authen'	=>	true,
				'direct_lv'	=>	[
					4		=>	3,
				],
				'people'	=>	0,
			],
			'reward'		=>	[
				'money'		=>	0,
				'machine'	=>	[],
				'power'		=>	0,
			],
			'profit'		=>	[
			],
			'trade'			=>	[
			],
			'commission'	=>	[
				1			=>	0.1,
				2			=>	0.03,
			],
			'bonus'			=>	0.2,
		],*/
	],

	'sms'					=>	[											// 短信配置

		// 必填通用项
		'length'			=>	6,											// 验证码长度
		'refresh_in'		=>	60,											// 刷新时间，秒
		'expires_in'		=>	60 * 30,									// 有效时间，秒
		'verify_temp_id'	=>	251292,										// 模板编号，需要是数字

		// 选填云通讯
		'account_sid'		=>	'8a216da8645fab0e016463c0d41a015e',			// 下面六行属于云通讯的
		'auth_token'		=>	'31922fab7fc3471facb25c31594e5ef3',
		'rest_url'			=>	'https://app.cloopen.com:8883',
		'appid'				=>	'8a216da8645fab0e016463c0d47e0165',
		'apptoken'			=>	'',
		'version'			=>	'2013-12-26',
		
		//极速短信
		'jisu'              => [
			'appkey'        =>  '291ddcd8a946143f',
			'rest_url'      =>  'https://api.jisuapi.com/sms/send',
		],

		// 选填阿里云
		/*'aliyun'			=>	[											// 下面属于阿里云的
			'SignName'			=>	'',
			'TemplateCode'		=>	'',
			'accessKeyId'		=>	'',
			'accessKeySecret'	=>	'',
			'security'			=>	true,
			'domain'			=>	'dysmsapi.aliyuncs.com',
		],*/

		// 选填、其他运营商
		// 'other'				=>	[
		// 	'account_sid'	=>	'2e26a7b8cb2d4a9eab45d4149db12760',
		// 	'auth_token'	=>	'3e6ef30af6774b45befc8b5b67d285d0',
		// 	'rest_url'		=>	'https://api.miaodiyun.com/20150822/',
		// ],
	],

	'exchange_key'			=>	'',

	'businesses'			=>	[											// 所有业务类型
		10					=>	'Trading buy',
		11					=>	'Trading sale',
		12					=>	'Transaction cancellation',
		13					=>	'Transfer out',
		14					=>	'Transfer in',
		15					=>	'imtoken Recharge',
		16					=>	'imtoken Withdrawal',
		17					=>	'imtoken Withdrawal failed',
		18					=>	'Shared ore pool',
		19					=>	'Purchase power items',
		20					=>	'Activate engine',
		21					=>	'Engine revenue',
		22					=>	'Mall shopping',
		23					=>	'Scraping card',
		24					=>	'Mall revenue',
		29					=>	'Alliance revenue',
		30					=>	'Team engine revenue',
		31					=>	'Team transaction income',
		32					=>	'Global transaction dividend',
		33					=>	'Chain contract - buy it now',
		34					=>	'Chain contract - group purchase',
		35					=>	'Chain contract - transfer the possession of',
		36					=>	'Chain contract - sell',
		37					=>	'Chain contract - profit',
		38					=>	'Chain contract - commission',
		39					=>	'Chain contract - Agency commission',
		40					=>	'Participate in crowdfunding',
		41					=>	'Crowdfunding success',
		42					=>	'Crowdfunding cancellation',
		50					=>	'Upgrade reward',
		88					=>	'System reward',
	],

	'log'					=>	[											// 日志类型，不建议修改
		1					=>	'Register and log in',
		2					=>	'Registered account',
		3					=>	'Login account',
		4					=>	'Retrieve password',
		5					=>	'Modify login password',
		6					=>	'Modify security password',
		7					=>	'Update information',
		8					=>	'Real name authentication',
		9					=>	'Log out',
		10					=>	'Administrator updates user information',
		11					=>	'Administrator adjusts user funds',
		12					=>	'Administrator audit real name authentication',
		13					=>	'Administrator changes user password',
		14					=>	'Administrator adjusts user level',
		15					=>	'Administrator adjusts user status',
		16					=>	'QQ quick login',
		17					=>	'Wechat quick login',
		20					=>	'Scraping card',
		21					=>	'Scraping card picking up',
		30					=>	'Buy Engine',
		31					=>	'One key ore collection',
		32					=>	'Mall shopping',
		60					=>	'Trading buy',
		61					=>	'Trading sale',
		62					=>	'User transfer',
		63					=>	'Daily check-in',
		64					=>	'imtoken Recharge',
		65					=>	'imtoken Withdrawal',
		66					=>	'Shared ore pool - receive income',
		67					=>	'Power calculation prop',
	],

	'default_currency'		=>	1,											// 默认货币
	'currencys'				=>	[											// 货币集合
		1					=>	[
			'name'			=>	'available NBB',									// 货币名称
			'field'			=>	'money',									// 数据库字段
			'businesses'	=>	[10, 11, 12, 13, 14, 15, 16, 17, 18, 20, 21, 22, 23, 24, 29, 50, 80, 81, 82],		// 参与业务
		],
		2					=>	[
			'name'			=>	'frozen NBB',
			'field'			=>	'deposit',
			'businesses'	=>	[11, 12, 80, 81, 82],
		],
		3					=>	[
			'name'			=>	'Available points',
			'field'			=>	'score',
			'businesses'	=>	[20, 22, 24, 88],
		],
		4					=>	[
			'name'			=>	'Freezing integral',
			'field'			=>	'score_deposit',
			'businesses'	=>	[20, 22, 24, 88],
		],
	],
	'score'					=>	[											// 积分配置
		'enable'			=>	false,										// 是否启用
		'unit'				=>	'integral',										// 单位
	],

	'trade'					=>	[											// 交易配置
		/*'time'				=>	[											// 开盘时间
			[
				'open'		=>	'00:00:00',
				'close'		=>	'23:59:00',
			],
			[
				'open'		=>	'13:00:00',
				'close'		=>	'15:00:00',
			],
			[
				'open'		=>	'20:00:00',
				'close'		=>	'22:00:00',
			],
		],*/
		'limit'				=>	5,											// 每人未完成的订单买入卖出分别最多允许多少笔
		'charge'			=>	0.02,										// 交易手续费
		'buy'				=>	[											// 买入配置
			'number'		=>	[											// 买入数量
				'max'		=>	100,										// 最多买入数量
				'min'		=>	10,											// 最少买入数量
			],
			'allow'			=>	[],											// 为空表示不限制，在这里添加账号，表示只允许这部分人出售
		],
		'sell'				=>	[											// 卖出配置
			'number'		=>	[											// 卖出数量
				'max'		=>	100,										// 最多卖出数量
				'min'		=>	10,											// 最少卖出数量
			],
			'allow'			=>	[											// 为空表示不限制，在这里添加账号，表示只允许这部分人出售
			],

		],
		'status'			=>	[											// 订单状态
			0	=>	[
				'name' 		=>	'Cancelled',									// 状态类型
			],
			1	=>	[
				'name' 		=> 	'Matching',
			],
			2	=>	[
				'name' 		=> 	'Pending payment',
			],
			3	=>	[
				'name' 		=> 	'To be confirmed',
			],
			4	=>	[
				'name' 		=> 	'In complaint',
			],
			8	=>	[
				'name' 		=> 	'deal',
			],
		],
	],

	'transfer'				=>	[											// 转账配置
		/*'charge'			=>	[											// 手续费
			'percent' 		=>	0.05,
			'min'			=>	5,
			'max'			=>	10,
		],*/
		'charge'			=>	0.005,
		'min'				=>	100,
	],

	'event'					=>	[											// 活动配置
		'scratch'			=>	[											// 刮刮卡
			'enable'			=>	true,									// 是否开启
			'chance'			=>	[										// 机会配置
				'people'		=>	1,										// 每满20人，增加一次机会，为0代表机会无限
			],
			'reward'			=>	[										// 奖品配置
				[
					'id'		=>	1003,									// 奖品编号，可以自定义，但不能随便更改
					'name'		=>	'Lv1 Managed engine',								// 奖品名称
					'type'		=>	1,										// 类型，1：矿机，2：实物，3：话费
					'machine'	=>	1,										// 对应矿机的ID，类型为矿机时该项必填
					'percent'	=>	0.01,									// 中奖概率，如果大于等于1，表示必中，如果小于等于0，表示永远不会中奖
					'number'	=>	1000,									// 总数量
					'limit'		=>	[										// 中奖的限制
						'person'	=>	1,									// 每人最多中多少个
						'day'		=>	[1, 10],							// 所有人按天限制，【多少天内，最多中多少个】
					],
				],
				[
					'id'		=>	1002,									// 奖品编号，可以自定义，但不能随便更改
					'name'		=>	'0.02NBB',								// 奖品名称
					'value'		=>	0.02,
					'type'		=>	8,										// 类型，1：矿机，2：实物，3：话费
					'percent'	=>	0.7,									// 中奖概率，如果大于等于1，表示必中，如果小于等于0，表示永远不会中奖
					'number'	=>	5000,									// 总数量
					'limit'		=>	[										// 中奖的限制
						'person'	=>	10,									// 每人最多中多少个
						'day'		=>	[1, 10],							// 所有人按天限制，【多少天内，最多中多少个】
					],
				],
				[
					'id'		=>	1001,									// 奖品编号，可以自定义，但不能随便更改
					'name'		=>	'0.1NBB',								// 奖品名称
					'value'		=>	0.01,
					'type'		=>	8,										// 类型，1：矿机，2：实物，3：话费
					'percent'	=>	0.8,									// 中奖概率，如果大于等于1，表示必中，如果小于等于0，表示永远不会中奖
					'number'	=>	10000,									// 总数量
					'limit'		=>	[										// 中奖的限制
						'person'	=>	10,									// 每人最多中多少个
						'day'		=>	[1, 10],							// 所有人按天限制，【多少天内，最多中多少个】
					],
				],
				[
					'id'		=>	1005,									// 奖品编号，可以自定义，但不能随便更改
					'name'		=>	'0.001NBB',								// 奖品名称
					'value'		=>	0.001,
					'type'		=>	8,										// 类型，1：矿机，2：实物，3：话费
					'percent'	=>	0.8,									// 中奖概率，如果大于等于1，表示必中，如果小于等于0，表示永远不会中奖
					'number'	=>	10000,									// 总数量
					'limit'		=>	[										// 中奖的限制
						'person'	=>	10,									// 每人最多中多少个
						'day'		=>	[1, 10],							// 所有人按天限制，【多少天内，最多中多少个】
					],
				],
				[
					'id'		=>	1007,									// 奖品编号，可以自定义，但不能随便更改
					'name'		=>	'0.1NBB',								// 奖品名称
					'value'		=>	0.03,
					'type'		=>	8,										// 类型，1：矿机，2：实物，3：话费
					'percent'	=>	0.8,									// 中奖概率，如果大于等于1，表示必中，如果小于等于0，表示永远不会中奖
					'number'	=>	10000,									// 总数量
					'limit'		=>	[										// 中奖的限制
						'person'	=>	10,									// 每人最多中多少个
						'day'		=>	[1, 10],							// 所有人按天限制，【多少天内，最多中多少个】
					],
				],
				[
					'id'		=>	1006,									// 奖品编号，可以自定义，但不能随便更改
					'name'		=>	'0.0001NBB',								// 奖品名称
					'value'		=>	0.0001,
					'type'		=>	8,										// 类型，1：矿机，2：实物，3：话费
					'percent'	=>	1,									// 中奖概率，如果大于等于1，表示必中，如果小于等于0，表示永远不会中奖
					'number'	=>	10000,									// 总数量
					'limit'		=>	[										// 中奖的限制
						'person'	=>	10,									// 每人最多中多少个
						'day'		=>	[1, 10],							// 所有人按天限制，【多少天内，最多中多少个】
					],
				],
				[
					'id'		=>	1004,									// 奖品编号，可以自定义，但不能随便更改
					'name'		=>	'$50 call fee',								// 奖品名称
					'type'		=>	3,										// 类型，1：矿机，2：实物，3：话费
					'percent'	=>	0,										// 中奖概率，如果大于等于1，表示必中，如果小于等于0，表示永远不会中奖
					'number'	=>	0,									// 总数量
					'limit'		=>	[										// 中奖的限制
						'person'	=>	0,									// 每人最多中多少个
						'day'		=>	[1, 10],							// 所有人按天限制，【多少天内，最多中多少个】
					],
				],
				[
					'id'		=>	1010,									// 奖品编号，可以自定义，但不能随便更改
					'name'		=>	'iPhoneX',								// 奖品名称
					'type'		=>	2,										// 类型，1：矿机，2：实物，3：话费
					'percent'	=>	0,									// 中奖概率，如果大于等于1，表示必中，如果小于等于0，表示永远不会中奖
					'number'	=>	0,									// 总数量
					'limit'		=>	[										// 中奖的限制
						'person'	=>	0,									// 每人最多中多少个
						'day'		=>	[1, 10],							// 所有人按天限制，【多少天内，最多中多少个】
					],
				],

			],
			'rule'				=>	[										// 活动规则，一条一行
				'Prizes include NBB, engine, iphonex, phone bill, etc',
				'Every time you share an authenticated user, you will get a chance to be happy',
				'The goods will be delivered within 7 working days, and other prizes will arrive immediately',
				'The right of interpretation belongs to the platform',
			],
		],
		'pool'                  =>  [                   					// 共享矿池
            'enable'            =>  true,              					// 是否开启
            'volume'            =>  10000000,           					// 剩余容量
            'complexity'        =>  1850123315,         					// 起始复杂度
            'percent'			=>	0.00001,								// 算力和收益的比例，可以是0.0001比1，也可以是1比1
            'float'				=>	0.01,									// 浮动比例，比如收益100个货币，浮动0.01，最终可能是101，也可能是99
            'interval'			=>	60 * 60,								// 收益的时间间隔，单位是秒
            'background'		=>	'/static/image/pool/bg.png',			// 背景图片
        ],
	],

	'contact'				=>	[											// 联系我们
		'interval'			=>	60,											// 每次发言间隔，单位是秒
	],

	'oauth'					=>	[											// 第三方授权
		'wechat'			=>	[											// 微信授权
			'enable'		=>	false,										// 是否启用
		],
		'qq'				=>	[											// QQ授权
			'enable'		=>	false,										// 是否启用
			'appid'			=>	'101475973',
			'appkey'		=>	'59b3aa4c3a474bc0fabc550381fe590a',
		],
	],

	'store'					=>	[											// 商城配置
		'seller'			=>	[											// 商家服务
			'enable'		=>	false,										// 是否开启
			'catalog'		=>	[4, 5, 6],									// 允许发布的类目
			'limit'			=>	[											// 每人允许发布的商品数量
				1			=>	1,											// 1级可发1个
				2			=>	1,											// 2级可发2个
				3			=>	1,
				4			=>	1,
				5			=>	1,
				6			=>	1,
				7			=>	1,
				8			=>	1,
			],
			'charge'		=>	0.2,										// 成交手续费
		],
		'catalog'			=>	[											// 产品类目
			1 				=>	'引擎',										// 1固定为矿机，只能改名字
			2 				=>	'道具',										// 2固定为道具，只能改名字
			3 				=>	'精品',										// 3固定为官方发布的产品，只能改名字
			4 				=>	'生活',										// 从4起，可以是用户自己发布的产品，可自由更改添加
			5 				=>	'数码',
		],
		'machine'			=>	[											// 矿机配置
			'activation'	=>	false,										// 购买矿机是否需要使用激活码
			'rebate'		=>	true,										// 购买矿机是否立即返利给上级
		],
	],

	'contract'				=>	[											// 合约配置
		'enable'			=>	true,										// 是否开启
		'agent'				=>	[],											// 代理商列表，用户账号 => 比例
		'commission'		=>	0.02,										// 佣金比例
		'catalog'			=>	[
			1				=>	'名人',
			2				=>	'书画',
			3				=>	'古董',
			4				=>	'品牌',
			5				=>	'宠物',
			6				=>	'游戏',
			7				=>	'汽车',
		],
	],

	'funding'				=>	[											// 众筹配置
		'enable'			=>	true,										// 是否开启
		'charge'			=>	0.2,										// 手续费
		'expire'			=>	15,											// 项目默认15天到期
		'audit'				=>	true,										// 是否需要审核
		'catalog'			=>	[
			1				=>	'创业',
			2				=>	'公益',
			3				=>	'慈善',
		],
		'condition'			=>	[											// 发布条件
			49999			=>	1000,										// 发布小于等于49999的，需要在投入最少1000货币
			99999			=>	5000,
			499999			=>	10000,
			999999			=>	50000,
			PHP_INT_MAX		=>	100000,
		],
		'level'				=>	[											// 用户档次
			[1000, 4999], [5000, 9999], [10000, 49999], [50000, 99999], [100000, PHP_INT_MAX],
		],
		'max'				=>	10000000,
	],
];
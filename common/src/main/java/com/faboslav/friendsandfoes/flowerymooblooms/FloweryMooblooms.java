package com.faboslav.friendsandfoes.flowerymooblooms;

import net.minecraft.util.Identifier;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

public final class FloweryMooblooms
{
	public static final String MOD_ID = "flowerymooblooms";
	private static final Logger LOGGER = LoggerFactory.getLogger(FloweryMooblooms.MOD_ID);

	public static Identifier makeID(String path) {
		return new Identifier(
			MOD_ID,
			path
		);
	}

	public static Logger getLogger() {
		return LOGGER;
	}
}

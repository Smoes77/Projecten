module.exports.run = async (bot, message, args) => {

    if(!message.member.permissions.has("KICK_MEMBERS")) return message.reply("Jij hebt niet de benodigde permissies");

    await message.channel.permissionOverwrites.set([

        {
            id: message.guild.roles.cache.find(r => r.name === "@everyone").id,
            deny: ["SEND_MESSAGES"]
        }

    ]);

    return message.channel.send("Kanaal is gesloten");

}

module.exports.help = {
    name: "lockdown",
    category: "admin",
    description: "Zet een channel op lockdown!"
    
}